<?php

if (!function_exists('render')) {
    // Layout을 포함하여 뷰를 렌더링
    // 뷰 파일 이름, 뷰에 전달하는 데이터, 옵션
    // 옵션 : cache, saveData, strictVars
    // cache: 화면을 일정 시간 동안 저장해서 다시 만들지 않기
    // saveData: view에 넘긴 데이터를 다음 view에서도 유지할지
    // strictVars: 없는 변수를 사용하면 에러를 낼지
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

