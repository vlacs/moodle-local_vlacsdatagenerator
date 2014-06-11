<?php
/**
 * Add some VLACS "hack" fields to the Moodle core tables.
 */

function xmldb_local_vlacsdatagenerator_install($oldversion) {

    /// Add field idnumber_vsa to course.
    $table = new XMLDBTable('course');
    $field = new XMLDBField('idnumber_vsa');
    $field->setAttributes(XMLDB_TYPE_CHAR, '255', null, null, null, null, null, null, 'defaultrole');
    add_field($table, $field);

    /// Add field fullname_vsa to course.
    $field = new XMLDBField('fullname_vsa');
    $field->setAttributes(XMLDB_TYPE_CHAR, '255', null, null, null, null, null, null, 'idnumber_vsa');
    add_field($table, $field);
}