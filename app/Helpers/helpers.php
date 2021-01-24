<?php

/**
 * @param $type
 * @return int|mixed
 */
function m_per_page($type = 'per_page')
{
    if (session()->has($type)) {
        return session()->get($type);
    }
    return $perPage = 20;
}





