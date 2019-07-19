module.exports = {
  'rules': {
    'block-no-empty': null,
    'comment-empty-line-before': [
      'always',
      {
        'ignore': [
          'stylelint-commands',
          'after-comment'
        ]
      }
    ],
    'declaration-colon-space-after': 'always',
    'at-rule-no-unknown': [
      true,
      {
        'ignoreAtRules': [
          'extends',
          'tailwind',
          'apply'
        ]
      }
    ],
    'indentation': [
      'tab',
      {
        'except': [
          'value'
        ]
      }
    ],
    'max-empty-lines': 2,
    'rule-empty-line-before': [
      'always',
      {
        'except': [
          'first-nested'
        ],
        'ignore': [
          'after-comment'
        ]
      }
    ],
    'unit-whitelist': [
      'em',
      'rem',
      '%',
      's'
    ]
  }
}