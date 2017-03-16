/**
 * Created by GundamOO on 3/10/17.
 */
function readFile() {
    jQuery.get('dataset/Chicago.txt', function(txt) {
        $('#output').text(txt);
    });
}
