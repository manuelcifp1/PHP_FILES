<html>
<body>
    <form action="#" method="get">

        <input type="text" placeholder="nombre" name="nombre" <?php if(!empty ($_REQUEST['nombre'])):?> value="<?php echo $_REQUEST['nombre'];?>" <?php endif;?>>

        <input type="number" placeholder="edad" name="edad" <?php if(!empty($_REQUEST['nombre'])):?> value="<?php echo $_REQUEST['edad'];?>" <?php endif;?>>
        
        <input type="submit">

    </form>
</body>
</html>