<?php

namespace Dash\Collections;

function where($collection, $properties)
{
	$matches = matches($properties);
	$results = array();

	foreach ($collection as $key => $value) {
		if ($matches($value)) {
			$results[$key] = $value;
		}
	}

	return $results;
}