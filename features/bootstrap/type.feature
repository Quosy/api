Feature: Types feature
  Scenario: Add type
    When I add "Content-Type" header equal to "application/json"
    And I add "Accept" header equal to "application/json"
    And I send a "POST" request to "/api/types" with body:
    """
    {
        "name": "Atelier",
        "price": "110"
    }
    """
    Then the response status code should be 201
    And the response should be in JSON

  Scenario: Update type
    When I add "Content-Type" header equal to "application/json"
    And I send a "PUT" request to "/api/types/1" with body:
    """
    {
        "name": "Atelier perfectionnement",
        "price": "110"
    }
    """
    Then the response status code should be 200


  Scenario: Get informations of type
    When I send a "GET" request to "/api/types/1"
    Then the response status code should be 200

  Scenario: delete type
    When I add "Content-Type" header equal to "application/json"
    And I send a "DELETE" request to "/api/types/1"
    Then the response status code should be 200
