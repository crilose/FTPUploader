<?php

function pulisciClient($content)
{
    return filter_var(htmlspecialchars($content), FILTER_SANITIZE_STRING);

}

function checkDefault($src,$compare)
{
    if($src == $compare)
    {
        return false;
    }
    else
    {
        return true;
    }
}
