<?php

namespace sajjadgozal\SimpleCrud\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;
use sajjadgozal\SimpleCrud\service\Resolve;

class ExtractItem extends Middleware
{

    /**
     *
     * @var array
     */
    protected $except = [
        //
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (! $request->model->hasCrud) {
            return abort(404,'model not connected to simple crud package');
        }

        if($request->id) {
            $item = Resolve::getItemById($request->model ,$request->id);
            $request->item = $item;

            if(! $item) {
                return abort(404,'item does not exist');
            }
        }

        return $next($request);
    }
}
