<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines German
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| such as the size rules. Feel free to tweak each of these messages.
	|
	*/

	"accepted"         => "Die :attribute müssen gelesen und akzeptiert werden.",
	"active_url"       => "Keine gültige URL",
	"after"            => "The :attribute must be a date after :date.",
	"alpha"            => "The :attribute may only contain letters.",
	"alpha_dash"       => "The :attribute may only contain letters, numbers, and dashes.",
	"alpha_num"        => "The :attribute may only contain letters and numbers.",
	"before"           => "The :attribute must be a date before :date.",
	"between"          => array(
		"numeric" => "The :attribute must be between :min - :max.",
		"file"    => "The :attribute must be between :min - :max kilobytes.",
		"string"  => "The :attribute must be between :min - :max characters.",
	),
	"confirmed"        => "The :attribute confirmation does not match.",
	"date"             => "The :attribute is not a valid date.",
	"date_format"      => "The :attribute does not match the format :format.",
	"different"        => "The :attribute and :other must be different.",
	"digits"           => "The :attribute must be :digits digits.",
	"digits_between"   => "The :attribute must be between :min and :max digits.",
	"email"            => "Keine gültige Emailadresse.",
	"exists"           => "The selected :attribute is invalid.",
	"image"            => "Es werden nur Bilddateien akzeptiert",
	"audio"            => "Es werden nur Audiodateien akzeptiert",
	"in"               => "The selected :attribute is invalid.",
	"integer"          => "The :attribute must be an integer.",
	"ip"               => "The :attribute must be a valid IP address.",
	"max"              => array(
		"numeric" => "The :attribute may not be greater than :max.",
		"file"    => "Die Datei darf nicht größer als :max Kilobyte sein.",
		"string"  => "The :attribute may not be greater than :max characters.",
	),
	"mimes"            => "The :attribute must be a file of type: :values.",
	"min"              => array(
		"numeric" => "Der Wert für :attribute muss größer als :min sein.",
		"file"    => "The :attribute must be at least :min kilobytes.",
		"string"  => "Es müssen mindestens :min Zeichen eingegeben werden.",
	),
	"not_in"           => "The selected :attribute is invalid.",
	"numeric"          => "The :attribute must be a number.",
	"regex"            => "The :attribute format is invalid.",
	"required"         => "Dieses Feld muss gefüllt sein.",
	"required_if"      => "The :attribute field is required when :other is :value.",
	"required_with"    => "The :attribute field is required when :values is present.",
	"required_without" => "The :attribute field is required when :values is not present.",
	"same"             => "The :attribute and :other must match.",
	"size"             => array(
		"numeric" => "The :attribute must be :size.",
		"file"    => "The :attribute must be :size kilobytes.",
		"string"  => "The :attribute must be :size characters.",
	),
	"unique"           => "Dieser Name existiert leider schon vergeben!",
	"url"              => "Keine gültige URL",
	"recaptcha" => 'Eingabe stimmt nicht überein.',

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(),

);