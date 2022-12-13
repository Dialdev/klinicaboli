<a href="#success" class="success__form-result"></a>
<?if (($_GET['formresult']=='addok') && ($_GET['WEB_FORM_ID']!='6')){?>
   <script>
       history.pushState(null, null, window.location.href.replace("&formresult=addok", ""));
        setTimeout( function() { $('.success__form-result').click(); } , 600);
    </script>
    <div class="modal_container modal_success" id="success">
        <div class="modal_close"></div>
        <h2>Cпасибо, ваша заявка принята</h2>
        <p>Ваша заявка отправлена, в ближайшее время<br>
            наши менеджеры свяжутся с Вами.</p>
        <p>БЛАГОДАРИМ ВАС ЗА ОБРАЩЕНИЕ!</p>
    </div>
<?}?>