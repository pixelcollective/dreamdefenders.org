import { breakpoints, baseUrl } from '../../project.json.js'

beforeEach(() => cy.visit(baseUrl));

describe('Visual integration test suite', function() {
  it('Loads the Homepage', function() {
    cy.visit(baseUrl);
    cy.percySnapshot('/', { width: breakpoints });
  });
});
