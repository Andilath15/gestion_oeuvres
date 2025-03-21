<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    // public function modifier_traitement(Request $request, $id)
    {
        $article = Articles::findOrFail($id);
        /*
        $article->titre = $request->article_titre;
        $article->resume = $request->article_resume;
        $article->description = $request->article_description;
        $article->tags = $request->article_tags;
        $article->slug = Str::slug(date('Y-m-d') . '-' . $request->article_slug);
        $article->categorie_id = $request->article_categorie_id;
        */

        $article->update([
            'titre' => $request->titre,
            'image' => $request->image,
            'resume' => $request->resume,
            'categorie_id' => $request->categorie_id,
            'description' => $request->description,
            'tags' => $request->tags,
            'slug' => Str::slug(date('Y-m-d') . '-' . $request->slug)
        ]);
        $article->save();
        return redirect()->route('admin.articles.liste')->with('success', 'Article et catégorie mis à jour avec succès.');
    }

    public function supprimer(Request $request, $id)
    {
        $article = Articles::findOrFail($id);

        $article->delete();
        return redirect()->route('admin.articles.liste')->with('success', 'Article supprimer avec succès.');
    }

    public function detail()
    {
        return view('admin.articles.show');
    }

}
