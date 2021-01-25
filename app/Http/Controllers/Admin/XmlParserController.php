<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Repositories\XmlNewsRepository;
use Illuminate\Http\Request;


class XmlParserController extends Controller
{
    public function index(XmlNewsRepository $xmlRepository) {

        $result = $xmlRepository
            ->load(env('XML_NEWS_SOURCE'))
            ->parse()
            ->prepare()
            ->save();

        $result = $result ? __('xml.success_insert') : __('xml.failed_insert');

        return redirect()->route('admin::news::index')
            ->with('saveXmlResult', $result);
    }
}
