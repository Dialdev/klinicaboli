<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

function is_work()
{
    $res_arr = array();
    $connection = Bitrix\Main\Application::getConnection();
    $sql = "SELECT value FROM _medialog_engine WHERE name = 'last_answer_from_medialog'";
    $recordset = $connection->query($sql);
    $record = $recordset->fetch();
    $no_answer = abs(strtotime(date('Y-m-d H:i:s')) - strtotime($record['value']));
    if ($no_answer > 300)
        return 0;
    else
        return 1;
}

function send_sms($phone)
{
    $code = rand(10000, 99999);
    Include('QTSMS.class.php');
    $sms= new QTSMS('1674541','Connect123!','a2p-sms-https.beeline.ru');
     
    $sms_text = 'Код для подтверждения записи: '.$code;
    $target = $_GET['phone'];
    
    $sender='clinicaboli';
    $period=600;
    
    $result = $sms->post_message($sms_text, $target, $sender, null, $period);
    return $code;
}

function get_spec()
{
    $res_arr = array();
    $connection = Bitrix\Main\Application::getConnection();
    $sql = "SELECT DISTINCT napravlenie FROM _medialog_planning_data ORDER BY napravlenie ASC";
    $recordset = $connection->query($sql);
    while ($record = $recordset->fetch())
    {
        array_push($res_arr, $record['napravlenie']);
    }
    return json_encode($res_arr);
}


function get_available_dates($napravlenie = '')
{
    $res_arr = array();
    $connection = Bitrix\Main\Application::getConnection();
    $where = '';
    if ($napravlenie != '') $where = " WHERE md.napravlenie = '$napravlenie' ";
    
    $sql = "SELECT DISTINCT DATE(mp.free_date_time) as free_date FROM _medialog_planning_data md 
                INNER JOIN _medialog_planning mp ON md.pl_subj_id = mp.pl_subj_id
                ".$where." AND mp.free_date_time > NOW() 
                ORDER BY DATE(mp.free_date_time) ASC";
    
    $recordset = $connection->query($sql);
    while ($record = $recordset->fetch())
    {
        array_push($res_arr, (string)$record['free_date']);
    }
    return json_encode($res_arr);
}

function get_available_dates_for_pl_subj_id($pl_subj_id)
{
    $res_arr = array();
    $connection = Bitrix\Main\Application::getConnection();

    
    $sql = "SELECT DISTINCT DATE(mp.free_date_time) as free_date FROM _medialog_planning_data md 
                INNER JOIN _medialog_planning mp ON md.pl_subj_id = mp.pl_subj_id
                WHERE md.pl_subj_id = $pl_subj_id AND mp.free_date_time > NOW() 
                ORDER BY DATE(mp.free_date_time) ASC";
    
    $recordset = $connection->query($sql);
    while ($record = $recordset->fetch())
    {
        array_push($res_arr, (string)$record['free_date']);
    }
    return json_encode($res_arr);
}


function get_doctors($napravlenie = '', $date)
{
    $res_arr = array();
    $connection = Bitrix\Main\Application::getConnection();
    $and = '';
    if ($napravlenie != '') $and = " AND md.napravlenie = '".$napravlenie."'";
    
    $sql = "SELECT md.pl_subj_id, time(MIN(free_date_time)) AS min_free, time(MAX(free_date_time)) AS max_free, photo, fio, spec, vid_priema, staj, obrazovanie, sym_code, price FROM _medialog_planning_data md 
                INNER JOIN _medialog_planning mp ON md.pl_subj_id = mp.pl_subj_id
                WHERE DATE(mp.free_date_time) = DATE('".$date."') AND mp.free_date_time > NOW() ".$and."
                GROUP BY md.pl_subj_id
                ORDER BY fio ASC";
    
    $recordset = $connection->query($sql);
    while ($record = $recordset->fetch())
    {
        array_push($res_arr, array('pl_subj_id' => $record['pl_subj_id'], 
                                   'fio' => $record['fio'], 
                                   'spec' => $record['spec'],
                                   'vid_priema' => $record['vid_priema'],
                                   'staj' => $record['staj'],
                                   'obrazovanie' => $record['obrazovanie'],
                                   'sym_code' => $record['sym_code'],
                                   'price' => $record['price'],
                                   'min_free' => substr((string)$record['min_free'], 0, 5),
                                   'max_free' => substr((string)$record['max_free'], 0, 5),
                                   'photo' => $record['photo']
                                   ));
    }
    
    $avail_dates = get_available_dates($napravlenie);
    
    
    return json_encode(array('doctors' => $res_arr, 'dates' => $avail_dates));
}

function get_times($pl_subj_id, $date)
{
    $res_arr = array();
    $connection = Bitrix\Main\Application::getConnection();
    
    $sql = "SELECT time(free_date_time) as free_date_time
                FROM _medialog_planning 
                WHERE pl_subj_id = $pl_subj_id AND DATE(free_date_time) = DATE('".$date."')
                ORDER BY free_date_time ASC";
    $recordset = $connection->query($sql);
    while ($record = $recordset->fetch())
    {
        array_push($res_arr, substr((string)$record['free_date_time'], 0, 5));
    }
    return json_encode($res_arr);
}

function create_order($pl_subj_id, $date_time, $family, $name, $patronymic, $phone)
{
    $res_arr = array();
    $connection = Bitrix\Main\Application::getConnection();
    
    $phone = "+7 ".substr($phone, 2, strlen($phone));
    
    
    $sql = "INSERT INTO _medialog_orders(pl_subj_id, date_time, family, name, patronymic, phone, date_time_create) VALUES ($pl_subj_id, '$date_time', '$family', '$name', '$patronymic', '$phone', NOW())";
    $recordset = $connection->query($sql);
    return json_encode(true);    
}


if (isset($_GET['is_work']))
{
    echo is_work();
} 

if (isset($_GET['spec']))
{
    print_r(get_spec());
} 
if (isset($_GET['pl_dates']))
{
    print_r(get_available_dates_for_pl_subj_id($_GET['pl_subj_id']));
}
if (isset($_GET['doctors']))
{
    print_r(get_doctors($_GET['napravlenie'], $_GET['date']));
}
if (isset($_GET['times']))
{
    print_r(get_times($_GET['pl_subj_id'], $_GET['date']));
}

if (isset($_GET['create']))
{

    print_r(create_order($_GET['pl_subj_id'], $_GET['date_time'], $_GET['family'], $_GET['name'], $_GET['patronymic'], $_GET['phone'] ));
}

if (isset($_GET['sms']))
{
    print_r(send_sms($_GET['phone']));
}

?>