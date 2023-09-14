<?php

namespace App\Controllers;

class Home_page extends BaseController
{
    public function index()
    {   

        echo view('template/header');
        echo view("home_page");
        echo view('template/footer');
    }

    public function suggest() {
        // 获取提交的关键词
        $keyword = $this->request->getPost('keyword');

        // 如果提交的关键词不为空，则查询数据库获取搜索建议
        if (!empty($keyword)) {
            $db = \Config\Database::connect();

            // 根据 title 查询
            $titleBuilder = $db->table('videos');
            $titleBuilder->select('title');
            $titleBuilder->like('title', $keyword);
            $titleBuilder->limit(5);
            $titleQuery = $titleBuilder->get();
            $titleResults = $titleQuery->getResult();

            // 根据 tags 查询
            $courseBuilder = $db->table('videos');
            $courseBuilder->select('tags');
            $courseBuilder->like('tags', $keyword);
            $courseBuilder->limit(5);
            $courseQuery = $courseBuilder->get();
            $courseResults = $courseQuery->getResult();

            // 将搜索建议格式化为 HTML 并返回到客户端
            $output = '';
            if (!empty($titleResults)) {
                foreach ($titleResults as $row) {
                    $output .= '<div class="suggestion">' . $row->title . '</div>';
                }
            }

            if (!empty($courseResults)) {
                foreach ($courseResults as $row) {
                    $output .= '<div class="suggestion">' . $row->tags . '</div>';
                }
            }
            if (empty($titleResults) && empty($courseResults)) {
                $output .= '<div class="suggestion">No suggestions found</div>';
            }
            echo $output;
        }
    }

    public function search() {
        $keyword = $this->request->getPost('keyword');
        $results = null;
        $data= [
            'results' => $results
        ];
        if (!$keyword) {
            // 如果没有关键字，则直接跳转到搜索页
            echo view('template/header');
            echo view("search",$data);
            echo view('template/footer');
        }else {
            $model = model('App\Models\VideoModel');
            $results = $model->searchByKeyword($keyword);
            $data= [
                'results' => $results
            ];
            // return redirect()->to(base_url('search') . http_build_query(['results' => $results]));
            echo view('template/header');
            echo view("search",$data);
            echo view('template/footer');
            // return view('search', ['results' => $results]);
        }
    }

}
