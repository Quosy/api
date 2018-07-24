Feature: Users feature
  Scenario: Adding a new user
    When I add "Content-Type" header equal to "application/json"
    And I add "Accept" header equal to "application/json"
    And I send a "POST" request to "/api/users" with body:
    """
    {
      "username": "jenaye",
      "password": "security",
      "isActive": true,
      "email": "mike@les-tilleuls.coop",
      "lastLogin": "2018-07-21T19:52:20.553Z"
    }
    """
    Then the response status code should be 201
    And the response should be in JSON
    And the header "Content-Type" should be equal to "application/json; charset=utf-8"
    And the JSON nodes should contain:
      | username                | jenaye             |
      | email                   | mike@les-tilleuls.coop        |

  Scenario: update a user jenaye
    When I add "Content-Type" header equal to "application/json"
    And I send a "PUT" request to "/api/users/1" with body:
    """
    {
      "email": "jenaye@protonmail.com"
    }
    """
    Then the response status code should be 200


  Scenario: Get informations of user
    When I send a "GET" request to "/api/users/1"
    Then the response status code should be 200


  Scenario: delete user jenaye
    When I add "Content-Type" header equal to "application/json"
    And I send a "DELETE" request to "/api/users/1"
    Then the response status code should be 200
