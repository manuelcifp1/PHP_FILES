<html>
<body>
    <form action="#" method="get">

        <input type="text" placeholder="Nombre" name="nombre" <?php if (!empty ($_REQUEST['nombre'])):?> value="<?php echo $_REQUEST['nombre'];?>" <?php endif; ?>>

        <input type="number" placeholder="Edad" name="edad" <?php if (!empty($_REQUEST['nombre'])):?> value="<?php echo $_REQUEST['edad'];?>" <?php endif; ?>>
        
        <input type="submit">

    </form>
</body>
</html>