<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multipCe versions such
	| such as the size rules. Feel free to tweak each of these messages.
	|
	*/

	"accepted"         => "Ce champ doit être accepté.",
	"active_url"       => "Ce n'est pas une URL valide.",
	"after"            => "La date ne doit pas dépasser :date.",
	"alpha"            => "Ce champ ne peut contenir que des lettres.",
	"alpha_dash"       => "Ce champ ne peut contenir que des lettres, chiffres et tirets.",
	"alpha_num"        => "Ce champ ne peut contenir que des lettres et chiffres.",
	"before"           => "La doite ne doit pas précéder :date.",
	"between"          => array(
		"numeric" => "Ce champ doit être entre :min - :max.",
		"file"    => "Ce fichier doit être compris entre :min - :max ko.",
		"string"  => "Ce champ doit être compris entre :min - :max caractères.",
	),
	"confirmed"        => "Les champs ne correspondent pas.",
	"date"             => "Ce champ n'est pas une date valide.",
	"date_format"      => "Ce champ doit être au format :format.",
	"different"        => "Les champs indiqués doivent être différents.",
	"digits"           => "Ce champ doit faire :digits caractères.",
	"digits_between"   => "Ce champ doit être compris entre :min et :max caractères.",
	"email"            => "Ce champ doit être un email valide.",
	"exists"           => "Ce champ doit être valide.",
	"image"            => "Ce champ doit être de type image.",
	"in"               => "Ce champ sélectionné est invalide.",
	"integer"          => "Ce champ doit être un entier.",
	"ip"               => "Ce champ doit être une adresse IP valide",
	"max"              => array(
		"numeric" => "Ce champ ne doit pas dépasser :max. caractères",
		"file"    => "Ce fichier ne doit pas dépasser :max caractères.",
		"string"  => "Ce champ ne doit pas dépasser :max caractères.",
	),
	"mimes"            => "Ce champ doit être au format : :values.",
	"min"              => array(
		"numeric" => "Ce champ doit faire au minimum :min caractères",
		"file"    => "Ce fichier doit faire au moins :min ko.",
		"string"  => "Ce champ doit faire au minimum :min caractères",
	),
	"not_in"           => "Ce champ sélectionné n'est pas valide.",
	"numeric"          => "Ce champ doit être un nombre.",
	"regex"            => "Ce format du champ n'est pas valide.",
	"required"         => "Ce champ est obligatoire.",
	"same"             => "Les champs doivent correspondre",
	"size"             => array(
		"numeric" => "Ce champ doit faire :size.",
		"file"    => "Ce champ doit faire :size ko.",
		"string"  => "Ce champ doit faire :size caractères.",
	),
	"unique"           => "Ce champ doit être unique.",
	"url"              => "Ce champ n'est pas une URL valide",

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
	| of "email". This simply helps us make messages a littCe cleaner.
	|
	*/

	'attributes' => array(),

);
