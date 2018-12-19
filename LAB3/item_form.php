<form  method='POST' enctype="multipart/form-data">	
    <input type="text" hidden name="id" value='<?php if(isset($id)) echo $id?>'>	
    <table id='item-form-table'>
        <tr>
            <td>Наименование номенклатуры:</td>
            <td><input type="text" maxlength="30" name="name" value='<?php if(isset($name)) echo $name?>' ></td>
        </tr>
        <tr>
            <td>Бренд:</td> 
            <td><input type="text" maxlength="30" name="brand" value='<?php if(isset($brand)) echo $brand?>'></td>
        </tr>
        <tr>
            <td>Год выпуска:</td> 
            <td><input type="text" maxlength="30" name="year" value='<?php if(isset($year)) echo $year?>'></td>
        </tr>
        <tr>
            <td>Диаметр:</td>
            <td><input type="text" maxlength="30" name="diametr" value='<?php if(isset($diametr)) echo $diametr?>'></td>
        </tr> 		 		
        <tr>
            <td>Радиус:</td>
            <td><input type='text' name='radius' size='10' value='<?php if(isset($radius)) echo $radius?>'></td>
        </tr>
        <tr>
            <td>Изображение</td> 
            <td><input type='file' accept='image/jpeg' name='uploadfile' value="<?php if(isset($uploadfile)) echo $uploadfile?>"></td>
        </tr>
    </table>
    <input class='btn' type='submit' value='Сохранить'>
</form>