<?php
/**
 * Pterodactyl - Panel
 * Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com>
 * Some Modifications (c) 2015 Dylan Seidt <dylan.seidt@gmail.com>.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

namespace Pterodactyl\Http\Controllers\Base;

use Illuminate\Http\Request;
use Pterodactyl\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * Controller Constructor.
     */
    public function __construct()
    {
        //
    }

    /**
     * Returns listing of user's servers.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function getIndex(Request $request)
    {
        return view('base.index', [
            'servers' => $request->user()->serverAccessCollection(config('pterodactyl.paginate.frontend.servers')),
        ]);
    }

    /**
     * Generate a random string.
     *
     * @param  \Illuminate\Http\Request $request
     * @return string
     */
    public function getPassword(Request $request, $length = 16)
    {
        $length = ($length < 8) ? 8 : $length;

        $returnable = false;
        while (! $returnable) {
            $generated = str_random($length);
            if (preg_match('/[A-Z]+[a-z]+[0-9]+/', $generated)) {
                $returnable = true;
            }
        }

        return $generated;
    }
}
