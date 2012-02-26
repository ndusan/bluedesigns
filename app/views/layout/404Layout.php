<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xml:lang="en-US" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Blue Designs - 404 page</title>
        <link rel="shortcut icon" href="<?= IMAGE_PATH . 'favicon.ico'; ?>" type="image/x-icon" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="Description" content="" />
        <meta name="Keywords" content="" />
        <meta http-equiv="X-UA-Compatible" content="IE=7" />
        <!-- Load all custom css -->
        <?= $html->css('default', CSS_PATH); ?>
    </head>
    <body style="background-color: #FFF!important;">
        <div class="page404">
            <table width="100%">
                <tbody
                    <tr>
                        <td width="350" align="center">
                            <img src="<?= IMAGE_PATH . '404.jpg'; ?>" />  
                        </td>
                        <td>
                            <h2>Hmm... stranica koju tražite ne postoji</h2>
                            <p>Kako se ovo desilo?</p>
                            <a href="/sr">Vrati se na početnu stranu</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>