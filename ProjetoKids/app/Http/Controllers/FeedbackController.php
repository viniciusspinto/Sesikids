<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class FeedbackController extends Controller
{
    // mostra o formulário (criação)
    public function index()
    {
        return view('dashboard.index');
    }

    // salva o feedback
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'descricao' => 'required|string|min:3',
            'rating' => 'required|integer|between:1,5',
        ]);

        $data['user_id'] = Auth::id();

        Feedback::create($data);

        return redirect()->route('dashboard.index')->with('success', 'Feedback enviado com sucesso.');
    }

    // listagem de feedbacks (acessível a quem acessa o painel)
    public function comentarios()
    {
        $feedbacks = Feedback::orderBy('created_at', 'desc')->get();
        return view('dashboard.comentarios', compact('feedbacks'));
    }

    // gera o PDF (comentario-pdfgerar)
    public function pdfGerar()
    {
        $feedbacks = Feedback::orderBy('created_at', 'desc')->get();
        $pdf = Pdf::loadView('dashboard.pdf', compact('feedbacks'))->setPaper('a4', 'portrait');
        return $pdf->download('feedbacks_' . now()->format('Ymd_His') . '.pdf');
    }
}