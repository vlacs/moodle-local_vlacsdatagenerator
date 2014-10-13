@local @local_vlacsdatagenerator
Feature: Edit assessment pod
  In order to ...
  As a teacher
  I need to edit a pod in the assessment manager block

  @javascript
  Scenario: Edit assessment pod
    Given I load the vla test data
    And I log in as "teacher1"
    When I follow "Course 1"
    Then I turn editing mode on


