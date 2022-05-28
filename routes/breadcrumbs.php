<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Home
Breadcrumbs::for(trans("dashboard.name"), function ($trail) {
$trail->push(trans("dashboard.name"), route('escritorio'));
});

// Home > inscripcion
Breadcrumbs::for(trans("inscripcion.name"), function ($trail) {
$trail->parent(trans("dashboard.name"));
$trail->push(trans("inscripcion.name"), route('inscripcion.index'));
});

// Home > cargadodocumentos
Breadcrumbs::for(trans("documentos.names"), function ($trail) {
$trail->parent(trans("dashboard.name"));
$trail->push(trans("documentos.names"), route('cargadocumentos.index'));
});

// Home > pagos
Breadcrumbs::for(trans("pagos.name"), function ($trail) {
$trail->parent(trans("dashboard.name"));
$trail->push(trans("pagos.name"), route('pagos.index'));
});

// Home > listadogeneral
Breadcrumbs::for(trans("listadoGeneral.name"), function ($trail) {
$trail->parent(trans("dashboard.name"));
$trail->push(trans("listadoGeneral.name"), route('listadogeneral.index'));
});

// Home > gestionhojadevida
Breadcrumbs::for(trans("hv.names"), function ($trail) {
    $trail->parent(trans("dashboard.name"));
    $trail->push(trans("hv.names"), route('hv.index'));
});
// Home > gestionoportunidades
Breadcrumbs::for(trans("oportunidad.names"), function ($trail) {
$trail->parent(trans("dashboard.name"));
$trail->push(trans("oportunidad.names"), route('oportunidad.index'));
});

// Home > gestionoportunidad
Breadcrumbs::for(trans("oportunidad.name"), function ($trail, $id) {
$trail->parent(trans("oportunidad.names"));
$trail->push(trans("oportunidad.name"), route('oportunidad.edit', ['oportunida_id' => $id]));
});

// Home > vermigestion
Breadcrumbs::for(trans("reportesAdmicionesC.name1"), function ($trail) {
$trail->parent(trans("dashboard.name"));
$trail->push(trans("reportesAdmicionesC.name1"), route('reporac.migestion'));
});

// Home > reportematriculas
Breadcrumbs::for(trans("reportesAdmicionesC.name2"), function ($trail) {
$trail->parent(trans("dashboard.name"));
$trail->push(trans("reportesAdmicionesC.name2"), route('reporac.reporteMatriculas'));
});

// Home > chequeoTarjetas
Breadcrumbs::for(trans("chequeoTarjetas.name"), function ($trail) {
$trail->parent(trans("dashboard.name"));
$trail->push(trans("chequeoTarjetas.name"), route('chequeoTarjetas.index'));
});

// Home > Homologacion
Breadcrumbs::for(trans("homologacion.name"), function ($trail) {
$trail->parent(trans("dashboard.name"));
$trail->push(trans("homologacion.name"), route('homologacion.index'));
});

// Home > gestion pago
Breadcrumbs::for(trans("financieroPagos.name"), function ($trail) {
$trail->parent(trans("dashboard.name"));
$trail->push(trans("financieroPagos.name"), route('financierogpago.index'));
});
