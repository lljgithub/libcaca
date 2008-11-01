<?php
/*
 *  php-caca      Php binding for Libcaca
 *  caca.php      object layer for caca-php
 *  Copyright (c) 2008 Vion Nicolas <nico@picapo.net>
 *
 *
 *  This library is free software. It comes without any warranty, to
 *  the extent permitted by applicable law. You can redistribute it
 *  and/or modify it under the terms of the Do What The Fuck You Want
 *  To Public License, Version 2, as published by Sam Hocevar. See
 *  http://sam.zoy.org/wtfpl/COPYING for more details.
 */


class Canvas {
	private var cv;

	function setSize($width, $height) {
		return caca_set_canvas_width($this->cv, $width, $height);
	}

	function getWidth() {
		return caca_get_canvas_width($this->cv);
	}

	function getHeight() {
		return caca_get_canvas_height($this->cv);
	}
	
	function getAttr($x, $y) {
		return caca_get_attr($this->cv, $x, $y);
	}

	function setAttr($attr) {
		return caca_set_attr($this->cv, $x, $y, $attr);
	}

	function setColorANSI($foreground, $background) {
		return caca_set_color_ansi($this->cv, $foreground, $background);
	}

	function setColorARGB($foreground, $background) {
		return caca_set_color_argb($this->cv, $foreground, $background);
	}

	function putChar($x, $y, $c) {
		return caca_put_char($this->cv, $x, $y, $c);
	}

	function getChar($x, $y) {
		return caca_get_char($this->cv, $x, $y);
	}

	function putStr($x, $y, $str) {
		return caca_put_str($this->cv, $x, $y, $str);
	}

	function Clear() {
		return caca_canvas_clear($this->cv);
	}

	function Blit($x, $y, $canvas, $mask = false) {
		return caca_blit($this->cv, $x, $y, $canvas->get_resource(), ($mask != false) ? $mask->get_resource() : false );
	}

	function Invert() {
		return caca_invert($this->cv);
	}

	function Flip() {
		return caca_flip($this->cv);
	}

	function Flop() {
		return caca_flop($this->cv);
	}

	function Rotate180() {
		return caca_rotate_180($this->cv);
	}

	function RotateLeft() {
		return caca_rotate_left($this->cv);
	}

	function RotateRight() {
		return caca_rotate_right($this->cv);
	}

	function drawLine($x1, $y1, $x2, $y2, $char) {
		return caca_draw_line($this->cv, $x1, $y1, $x2, $y2, $color);
	}

	function drawPolyline($points, $char) {
		return caca_draw_polyline($this->cv, $points, $char);
	}

	function drawThinLine($x1, $y1, $x2, $y2) {
		return caca_draw_thin_line($this->cv, $x1, $y1, $x2, $y2);
	}

	function drawThinPolyline($points) {
		return caca_draw_thin_polyline($this->cv, $points);
	}

	function drawCircle($x, $y, $radius, $char) {
		return caca_draw_circle($this->cv, $x, $y, $radius, $char);
	}

	function drawEllipse($x1, $y1, $x2, $y2, $char) {
		caca_draw_ellipse($this->cv, $x1, $y1, $x2, $y2, $char);	
	}

	function drawThinEllipse($x1, $y1, $x2, $y2) {
		caca_draw_ellipse($this->cv, $x1, $y1, $x2, $y2);	
	}

	function fillEllipse($x1, $y1, $x2, $y2, $char) {
		caca_fill_ellipse($this->cv, $x1, $y1, $x2, $y2, $char);	
	}

	function drawBox($x1, $y1, $x2, $y2, $char) {
		caca_draw_box($this->cv, $x1, $y1, $x2, $y2, $char);
	}

	function drawThinBox($x1, $y1, $x2, $y2) {
		caca_draw_thin_box($this->cv, $x1, $y1, $x2, $y2);
	}

	function drawCP437Box($x1, $y1, $x2, $y2) {
		caca_draw_cp437_box($this->cv, $x1, $y1, $x2, $y2);
	}

	function fillBox($x1, $y1, $x2, $y2, $char) {
		caca_fill_box($this->cv, $x1, $y1, $x2, $y2, $char);
	}

	function drawTriangle($x1, $y1, $x2, $y2, $x3, $y3, $char) {
		caca_draw_triangle($this->cv, $x1, $y1, $x2, $y2, $x3, $y3, $char);
	}

	function drawThinTriangle($x1, $y1, $x2, $y2, $x3, $y3) {
		caca_draw_thin_triangle($this->cv, $x1, $y1, $x2, $y2, $x3, $y3);
	}

	function fillTriangle($x1, $y1, $x2, $y2, $x3, $y3, $char) {
		caca_fill_triangle($this->cv, $x1, $y1, $x2, $y2, $x3, $y3, $char);
	}

	function __construct($width = 0, $height = 0) {
		cv = caca_create_canvas($width, $height);
	}
	
	function get_resource() {
		return $this->cv;
	}
}