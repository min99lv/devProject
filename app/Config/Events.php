<?php

namespace Config;

use CodeIgniter\Events\Events;
use CodeIgniter\Exceptions\FrameworkException;
use CodeIgniter\HotReloader\HotReloader;

/*
 * --------------------------------------------------------------------
 * Application Events
 * --------------------------------------------------------------------
 * Events allow you to tap into the execution of the program without
 * modifying or extending core files. This file provides a central
 * location to define your events, though they can always be added
 * at run-time, also, if needed.
 *
 * You create code that can execute by subscribing to events with
 * the 'on()' method. This accepts any form of callable, including
 * Closures, that will be executed when the event is triggered.
 *
 * Example:
 *      Events::on('create', [$myInstance, 'myMethod']);
 */

Events::on('pre_system', static function (): void {
    if (ENVIRONMENT !== 'testing') {
        if (ini_get('zlib.output_compression')) {
            throw FrameworkException::forEnabledZlibOutputCompression();
        }

        while (ob_get_level() > 0) {
            ob_end_flush();
        }

        ob_start(static fn ($buffer) => $buffer);
    }

    /*
     * --------------------------------------------------------------------
     * Debug Toolbar Listeners.
     * --------------------------------------------------------------------
     * If you delete, they will no longer be collected.
     */
    if (CI_DEBUG && ! is_cli()) {
        Events::on('DBQuery', 'CodeIgniter\Debug\Toolbar\Collectors\Database::collect');
        service('toolbar')->respond();
        // Hot Reload route - for framework use on the hot reloader.
        if (ENVIRONMENT === 'development') {
            service('routes')->get('__hot-reload', static function (): void {
                (new HotReloader())->run();
            });
        }
    }
});


// Events::on('post_controller_constructor', function (){
//     helper('render');
// });

/*
이벤트 포인트
- pre_system : 시스템 실행 초기단계에 발생 기초 파일들은 로드 되었지만 라우팅이나 컨트롤러가 실행되기 전
- post_controller_constructor : 컨트롤러가 인스턴스화 된 직후, 메서드가 호출되기 직전에 발생
- post_system : 최종 응답이 브라우저에 전송된 후 발생 실행로그 남길때 사용
- email : 이메일 전송이 성공했을때 발생 
- DBQuery : 데이터베이스 쿼리가 실행될때마다 발생 쿼리 성능 모니터링이나 로그를 남길때 사용
- migrate : 마이그레이션이 성공적으로 완료된 후 

이벤트 설정 방법
- 이벤트 등록(app/Config/Events.php) : Events::on('이벤트이름', '함수이름');
*/


?>