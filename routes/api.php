<?php

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
 * Verbos Http
 *
 ** GET ** - Requisições utilizando o método GET devem retornar apenas dados. Utilizado para consumir dados

 ** POST ** - O método POST é utilizado para submeter uma entidade a um recurso específico, frequentemente causando uma mudança no estado do recurso ou efeitos colaterais no servidor. Utilizado para cadastrar dados

 ** PUT ** - O método PUT substitui todas as atuais representações do recurso de destino pela carga de dados da requisição.

 ** PATCH ** - O método PATCH é utilizado para aplicar modificações parciais em um recurso.

 ** DELETE ** - O método DELETE remove um recurso específico.
 *
 */

Route::get('users', function () {
    $users = User::all();

    return response()->json(compact('users'));
});

Route::get('tasks', function () {
    $tasks = Task::all();

    return response()->json(compact('tasks'));
});

Route::post('tasks', function (Request $request) {
    $data = $request->all();

    $task = Task::create($data);

    return response()->json(compact('task'));
});

Route::put('tasks/{task}', function (Request $request, Task $task) {
    $data = $request->all();

    $task->update($data);

    return response()->json(compact('task'));
});

Route::delete('tasks/{task}', function (Request $request, Task $task) {
    $task->delete();

    $success = "Task deletada com sucesso!";

    return response()->json(compact('success'));
});
