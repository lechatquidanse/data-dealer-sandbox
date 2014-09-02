Feature: news
  In order to read content of my interest
  As a guest user
  I want to view a list of news

  Scenario: view news
    Given I am a guest user
    When I am on "/football"
    Then I should see "Here is your news" in the output