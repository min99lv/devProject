<?php

if (!function_exists('render')) {
    /**
     * Layout을 포함하여 뷰를 렌더링
     */
    function render(string $name, array $data = [], array $options = [])
    {
        return view(
            // 메인 레이아웃 파일
            'layouts/layout',
            [
                // 구체적인 뷰 파일
                'content' => view($name, $data, $options),
            ],
            $options
        );
    }
}
?>

