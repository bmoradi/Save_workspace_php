# About save workspace php class
Sometimes occured when we need some points, we want stop current execution, and continue that loop or other things another time. With this class we can save variables in a file and restore it from beginning loop or other position.

<h2>Example</h2>
<p>We want save variables in a point and restore it from other point:</p>
<pre>
$a = 'ali';
$b = 5;
$c = [ "ali", "reza" ];
</pre>
<p>These three variables we want save and use it another time, we passed object name of workspace to save_workspace method to ignore this object from saving:</p>
<pre>
$workspace = new Php_state_freeze();
$workspace->save_workspace(get_defined_vars(), "workspace");
unset($a, $b, $c);
</pre>

<p>If we want change name of saving workspace file, we call set_file_name method before save_workspace method:</p>
<pre>
$workspace->set_file_name( "newFileName.db" );
</pre>
<p>For restore that variables we need below code:</p>
<pre>

$db = $workspace->restore_workspace();

foreach($db as $key => $val){
    //this way add a apostrophe to array to remove that
    ${$key} = unserialize(preg_replace("/'/i", "" , var_export($val,true)));
}
</pre>

<h2>Contact and Feedback</h2>
<p>If you'd like to contribute to save workspace  or file a bug or feature request, please visit its <a href="https://github.com/bmoradi/Save_workspace_php">GitHub page</a>.

</p>
