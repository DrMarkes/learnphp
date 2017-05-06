<h3>
    Адрес
</h3>
<p>
    123456 Москва, Малый Американский переулок 21
</p>
<h3>
    Задайте вопрос
</h3>
<form action="" method="post">
    <label>
        Тема письма:
    </label>
    <br/>
    <input name="subject" size="50" type="text"/>
    <br/>
    <label>
        Содержание:
    </label>
    <br/>
    <textarea cols="50" name="body" rows="10">
    </textarea>
    <br/>
    <br/>
    <input type="submit" value="Отправить"/>
</form>
<p>
    Максимальный размер отправляемых данных
    <?php showFileSize(); ?>
    байт.
</p>
<!-- Область основного контента -->
