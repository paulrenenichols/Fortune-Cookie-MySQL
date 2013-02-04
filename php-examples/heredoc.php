<?php
$author = "Mister Nichols";

/*
 * This is refered to in PHP as the "heredoc" construct.
 * It allows multiline strings.  However, HTML formatting rules apply when it is outputted.
 */

$out = <<<_END
This is a Headline

This is the first line.
This is the second.
- Written by $author.
_END;

echo $out;
?>