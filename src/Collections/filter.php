<?php

namespace Dash\Collections;

function filter($collection, $predicate)
{
	$filtered = array();

	foreach ($collection as $key => $value) {
		if (call_user_func($predicate, $value, $key)) {
			$filtered[$key] = $value;
		}
	}

	return $filtered;
}