 * THE SOFTWARE.
 */
$post = $_POST;
if(!empty($post)) {
    if(isset($post['remove'])) {
        foreach($post['remove'] as $toBeRemoved => $buttonValue) {
            unlink('xml/' . $toBeRemoved);
        }
    }
}
$filename = uniqid("h");
include_once 'header.php';
$files = array_filter(scandir('xml'), function($file) {
    $extension = ".xml";
    $length = strlen($extension);
    return (substr($file, -$length) === $extension);
});
?>
<form method="POST" action="prepat.php?file=<?php echo $filename; ?>">
    <input size="80" placeholder="Enter url" type="text" name = "url">
    <input size="10" placeholder="Encoding Type" type="text" name = "encoding">
    <input type="submit">
</form>
<?php
if(count($files) > 0) {
?>
<form method="POST" action=".">
    <ul>
        <?php
            foreach( $files as $file ) {
            ?>
                <li>
                    <a href="xml/<?php echo $file; ?>"><?php echo $file; ?></a>
                    <input type="submit" name="remove[<?php echo $file; ?>]" value="DEL">
                </li>
            <?php
            }
        ?>
    </ul>
</form>
<?php
}
include_once 'footer.php';
?>
