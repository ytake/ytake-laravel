<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

/**
 * Class Controller
 */
class Controller extends BaseController
{
    // デフォルトでuseされているトレイトはコントローラ限定のものではないため削除
    // デフォルトで用意されているものを使うように、コントローラに処理を書来すぎないようにするために削除しています。
    // Auth関連のコントローラも同様にデフォルトの状態で利用することはほぼ無い為削除しています
}
