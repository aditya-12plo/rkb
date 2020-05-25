<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        // return parent::render($request, $exception);
		// When we've got non-matched route resulting in "404 Not Found" response.
		if ($exception instanceof NotFoundHttpException) {
			$config = app('config');
			$default_locale = $config['app.locale'];
			$locale = $request->segment(1);

			// See if locale in url is absent or isn't among known languages.
			if (!\in_array($locale, $config['app.locales'])) {
				// Redirect to same url with default locale prepended.
				$uri = $request->getUriForPath('/' . $default_locale . $request->getPathInfo());

				return redirect($uri, 301);
			}
		}
        if($this->isHttpException($exception))
        {
			$config = app('config');
			$default_locale = $config['app.locale'];
            switch ($exception->getStatusCode()) {
                case 404:
                // return redirect()->route('pagenotfound');
                return redirect('/'.$default_locale.'/page-not-found');
                    break;
                case 500:
                // return redirect()->route('servererror');
                return redirect('/'.$default_locale.'/server-error');
                    break;
                
                default:
                    // return $this->route('pagenotfound');
                return redirect('/'.$default_locale.'/server-error');
                    break;
            }
        }
        else
        {
            return parent::render($request, $exception);
        }
    }
}
