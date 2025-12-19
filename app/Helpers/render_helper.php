<?php

/**
 * renderSection 기반 구조 도입에 따라 render_helper는 더 이상 필요하지 않습니다.
 * 
 * 변경 이유:
 * - render()는 단일 슬롯($content) 제약이 있음
 * - renderSection은 다중 섹션 지원으로 더 강력한 레이아웃 시스템 제공
 * - View 파일이 직접 layout을 선택하므로 권한별 처리 간단
 * 
 * 사용법:
 * 
 * // View 파일에서
 * <?= $this->extend('layouts/user/layout') ?>
 * <?= $this->section('content') ?>
 *   <!-- 콘텐츠 -->
 * <?= $this->endSection() ?>
 * 
 * // Controller에서
 * return view('your/page', $data);
 */

?>
