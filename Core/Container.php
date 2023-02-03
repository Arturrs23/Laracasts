<?php

namespace Core;

use Exception;

class Container
{
    protected $bindings = [];

    // Bind a key to a resolver
    // add
    public function bind($key, $resolver)
    {
        $this->bindings[$key] = $resolver;
    }

    // Resolve a binding given the key
    // remove
    public function resolve($key)
    {
        // Check if there is a binding for the key
        if (!array_key_exists($key, $this->bindings)) {
            throw new Exception("No matching binding found for {$key}");
        }

        // Get the resolver for the binding
        $resolver = $this->bindings[$key];

        // Call the resolver and return the result
        return call_user_func($resolver);
    }
}
