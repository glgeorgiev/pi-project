<?php

namespace App\Http\Controllers\Frontend;

use DB;
use Illuminate\Http\Request;
use XMLWriter;

class RssController extends FrontendController
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles = DB::table('view_articles')->orderBy('id', 'desc')->limit(25)->get();

        $xml = new XMLWriter;
        $xml->openMemory();
        $xml->setIndent(true);
        $xml->setIndentString(str_repeat(' ', 4));
        $xml->startDocument('1.0', 'UTF-8');
        $xml->startElement('rss');
        $xml->writeAttribute('version', '2.0');
        $xml->writeAttributeNs('xmlns', 'atom', null, 'http://www.w3.org/2005/Atom');
        $xml->startElement('channel');

        $xml->startElementNs('atom', 'link', null);
        $xml->writeAttribute('href', $request->url());
        $xml->writeAttribute('rel', 'self');
        $xml->writeAttribute('type', 'application/rss+xml');
        $xml->endElement();
        $xml->writeElement('title', 'RSS Feed');
        $xml->writeElement('link', $request->url());
        $xml->writeElement('description', 'RSS Feed for http://pi.demos.maniaci.net');

        foreach ($articles as $article) {
            $xml->startElement('item');

            $xml->writeElement('title', $article->title);
            $xml->writeElement('category', $article->section);
            $xml->startElement('guid');
            $xml->writeAttribute('isPermaLink', 'false');
            $xml->writeCdata('pi.demos.maniaci.net-' . $article->id);
            $xml->endElement();
            $xml->writeElement('link', $article->slug);

            $xml->writeElement('description', $article->description);

            $xml->endElement();
        }

        $xml->endElement();

        $xml->endElement();
        $xml->endDocument();
        return response($xml->outputMemory(true), 200, [
            'Content-Type'  => 'text/xml',
        ]);
    }
}