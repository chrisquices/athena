<?php

namespace App\Http\Controllers;

use App\Models\CalendarioAcademico;
use App\Models\MallaCurricular;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Asignatura;
use App\Models\Area;
use App\Helpers\AppHelper;

class CalendarioAcademicoController extends Controller
{
				public function index()
				{
								$calendarios_academicos = CalendarioAcademico::where('ano', date('Y'))->get();

								$anos = CalendarioAcademico::orderBy('ano', 'desc')->get()->unique('ano')->toArray();

								$anos = array_column($anos, 'ano');

								return view('procesos.academicos.calendarios-academicos.index')
												->with('anos', $anos)
												->with('calendarios_academicos', $calendarios_academicos);
				}

				public function getCalendariosAcademicos(Request $request) {
								return CalendarioAcademico::where('ano', $request->ano)->get();
				}

				public function create()
				{
								$anos = MallaCurricular::orderBy('ano', 'desc')->get()->unique('ano')->toArray();

								$anos = array_column($anos, 'ano');

								return view('procesos.academicos.calendarios-academicos.create')
												->with('anos', $anos);
				}

				public function store(Request $request, CalendarioAcademico $calendario_academico)
				{
								$validator = $request->validate([
												'ano' => [
																'required',
												],
												'nombre' => [
																'required',
												],
												'fecha' => [
																'required',
																'after_or_equal:'.date('Y-m-d')
												],
								]);

								$calendario_academico->ano = $request->ano;
								$calendario_academico->nombre = $request->nombre;
								$calendario_academico->fecha = $request->fecha;

								$calendario_academico->save();

								AppHelper::instance()->logUserActivity('calendario_academico', 'creacion');

								return redirect('procesos/academicos/calendarios-academicos')->with('success', 'success');
				}

				public function show(CalendarioAcademico $calendario_academico)
				{
								return view('procesos.academicos.calendarios-academicos.show', compact('calendario_academico'));
				}

				public function edit(CalendarioAcademico $calendario_academico)
				{
								$anos = MallaCurricular::orderBy('ano', 'desc')->get()->unique('ano')->toArray();

								$anos = array_column($anos, 'ano');

								return view('procesos.academicos.calendarios-academicos.edit')
												->with('anos', $anos)
												->with('calendario_academico', $calendario_academico);
				}

				public function update(Request $request, CalendarioAcademico $calendario_academico)
				{
								$validator = $request->validate([
												'ano' => [
																'required',
												],
												'nombre' => [
																'required',
												],
												'fecha' => [
																'required',
																'after_or_equal:'.date('Y-m-d')
												],
								]);

								$calendario_academico->ano = $request->ano;
								$calendario_academico->nombre = $request->nombre;
								$calendario_academico->fecha = $request->fecha;

								$calendario_academico->save();

								AppHelper::instance()->logUserActivity('calendario_academico', 'actualizacion');

								return redirect('procesos/academicos/calendarios-academicos')->with('success', 'success');
				}

				public function delete(CalendarioAcademico $calendario_academico)
				{
								try {
												$calendario_academico->delete();

												AppHelper::instance()->logUserActivity('calendario_academico', 'eliminacion');

												return redirect('procesos/academicos/calendarios-academicos')->with('success', 'success');
								} catch (\Illuminate\Database\QueryException $e) {

												return redirect('procesos/academicos/calendarios-academicos')->with('error', 'error');
								}
				}
}
