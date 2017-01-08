<?php
try {
    // something
} catch(Exception $e) {
	header("location: http://stackoverflow.com/search?q=[php] ".$e->getMessage());
}

set_exception_handler(function(Throwable $e){
    header('Location: https://stackoverflow.com/search?q=[php] ' . $e->getMessage());
});

?>