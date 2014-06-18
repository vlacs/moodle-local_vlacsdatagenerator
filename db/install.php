<?php
/**
 * Add some VLACS "hack" fields to the Moodle core tables.
 */

function xmldb_local_vlacsdatagenerator_install() {
    global $DB;
    $dbman = $DB->get_manager();

    /// Add field idnumber_vsa to course.
    $table = new xmldb_table('course');
    $field = new xmldb_field('idnumber_vsa');
    $field->set_attributes(XMLDB_TYPE_CHAR, '255', null, null, null, null, 'defaultrole');
    $dbman->add_field($table, $field);

    /// Add field fullname_vsa to course.
    $field = new xmldb_field('fullname_vsa');
    $field->set_attributes(XMLDB_TYPE_CHAR, '255', null, null, null, null, 'idnumber_vsa');
    $dbman->add_field($table, $field);

    // Create a category named 'Empty Classrooms' (GENIUS_EMPTY_CLASSROOM_CATEGORY)
    $category = new stdClass();
    $category->name = 'Empty Classrooms';
    $DB->insert_record('course_categories', $category);
}