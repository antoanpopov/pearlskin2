<?php

/*
|--------------------------------------------------------------------------
| Translatable fields
|--------------------------------------------------------------------------
*/
/**
 * Add an input field
 * @param string $name The field name
 * @param string $title The field title
 * @param object $errors The laravel errors object
 * @param string $lang the language of the field
 * @param null|object $object The entity of the field
 */
use Illuminate\Support\ViewErrorBag;

/*
|--------------------------------------------------------------------------
| Standard fields
|--------------------------------------------------------------------------
*/
/**
 * Add an input field
 * @param string $name The field name
 * @param string $title The field title
 * @param object $errors The laravel errors object
 * @param null|object $object The entity of the field
 */
Form::macro('dateTimePicker', function ($name, $title, ViewErrorBag $errors, $object = null, array $options = []) {

    $string  = "<div class='".$options['class']."'>";
    $string  .= "<div class='form-group " . ($errors->has($name) ? ' has-error' : '') . "'>";
    $string .= Form::label($name, $title);
    $string .= "<div class='input-group date' id='datetimepicker_" . $name . "'>";


    if (is_object($object)) {
        $currentData = ($object->$name)? \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $object->$name)->format('d-m-Y H:i') : '';
    } else {
        $currentData = \Carbon\Carbon::now();
    }

    $string .= Form::text($name, Request::old($name, $currentData),['class' => 'form-control']);
    $string .= "<span class='input-group-addon'><span class='glyphicon glyphicon-calendar'></span></span>";
    $string .= "</div>";
    $string .= $errors->first($name, '<span class="help-block">:message</span>');
    $string .= "</div></div>";
    $string .= "<script type=\"text/javascript\">
            $(function () {
                $('#datetimepicker_" . $name . "').datetimepicker({ format : 'DD-MM-YYYY HH:mm', locale : '".locale()."'});
            });
        </script>";

    return $string;
});

Form::macro('datePicker', function ($name, $title, ViewErrorBag $errors, $object = null, array $options = []) {

    $string  = "<div class='".$options['class']."'>";
    $string  .= "<div class='form-group " . ($errors->has($name) ? ' has-error' : '') . "'>";
    $string .= Form::label($name, $title);
    $string .= "<div class='input-group date' id='datepicker_" . $name . "'>";


    if (is_object($object)) {
        $currentData = $object->{$name} ?: '';
    } else {
        $currentData = \Carbon\Carbon::now();
    }

    $string .= Form::text($name, Request::old($name, $currentData),['class' => 'form-control']);
    $string .= "<span class='input-group-addon'><span class='glyphicon glyphicon-calendar'></span></span>";
    $string .= "</div>";
    $string .= $errors->first($name, '<span class="help-block">:message</span>');
    $string .= "</div></div>";
    $string .= "<script type=\"text/javascript\">
            $(function () {
                $('#datepicker_" . $name . "').datetimepicker({ format : 'DD-MM-YYYY', locale : '".locale()."'});
            });
        </script>";

    return $string;
});

/**
 * Add a dropdown select field
 * @param string $name The field name
 * @param string $title The field title
 * @param object $errors The laravel errors object
 * @param array $choices The choices of the select
 * @param null|array $object The entity of the field
 */
Form::macro('customSelect', function ($name, $title, ViewErrorBag $errors, $choices, $object = null, $selectedProperty ,array $options = []) {

    $string  = "<div class='".$options['class']."'>";
    $string  .= "<div class='form-group dropdown" . ($errors->has($name) ? ' has-error' : '') . "'>";
    $string .= "<label for='$name'>$title</label>";

    if (is_object($object)) {
            $currentData = isset($object->$selectedProperty) ? $object->$selectedProperty : '';
    } else {
        $currentData = false;
    }

    /* Bootstrap default class */
    $array_option = ['class' => 'form-control'];
    $string .= "<select class=\"form-control\" name=\"$name\">";
                    foreach($choices as $choice) {
                        $string .= "<option value=\"$choice->id\"";
                        $string .= ($choice->id == $object->$name)? 'selected' : '';
                        $string .= ">".$choice->$selectedProperty."</option>";
                    }

     $string .= "</select>";
    $string .= $errors->first($name, '<span class="help-block">:message</span>');
    $string .= "</div>";
    $string .= "</div>";

    return $string;
});
