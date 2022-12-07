export const GAME_TITLE = 'Vārdulis'

export const WIN_MESSAGES = ['Labi padarīts!', 'Apsveicami!', 'Bumbās!', 'Stilīgi']
export const GAME_COPIED_MESSAGE = 'Spēle nokopēta starpliktuvē'
export const NOT_ENOUGH_LETTERS_MESSAGE = 'Pārāk maz burtu'
export const WORD_NOT_FOUND_MESSAGE = 'Vārds netika atrasts'
export const HARD_MODE_DESCRIPTION =
  'Atklātie burti obligāti jālieto turpmākos minējumos'
export const HIGH_CONTRAST_MODE_DESCRIPTION = 'Uzlabotai saskatīšanai'
export const CORRECT_WORD_MESSAGE = (solution: string) =>
  `Tu zaudēji, vārds bija ${solution}`
export const HARD_MODE_ALERT_MESSAGE =
  'Grūto režīmu var ieslēgt tikai spēles sākumā!'
export const WRONG_SPOT_MESSAGE = (guess: string, position: number) =>
  `Burts ${guess} jālieto pozīcijā ${position}`
export const NOT_CONTAINED_MESSAGE = (letter: string) =>
  `Minējumam jāsatur burts ${letter}`
export const ENTER_TEXT = 'Ievadīt'
export const DELETE_TEXT = 'Dzēst'
export const STATISTICS_TITLE = 'Statistika'
export const GUESS_DISTRIBUTION_TEXT = 'Minējumu sadalījums'
export const NEW_WORD_TEXT = 'Jauns vārds pēc'
export const SHARE_TEXT = 'Dalīties'
export const SHARE_FAILURE_TEXT =
  'Dalīšanās neizdevās. Šī iespēja pieejama tikai ar drošu kontekstu (HTTPS), dažos vai visos atbalstošos pārlūkos.'
export const MIGRATE_BUTTON_TEXT = 'Pārvietot'
export const MIGRATE_DESCRIPTION_TEXT =
  'Pārvietot savu statistiku uz jaunu ierīci.'
export const TOTAL_TRIES_TEXT = 'Mēģinājumi'
export const SUCCESS_RATE_TEXT = 'Atminēti'
export const CURRENT_STREAK_TEXT = 'Šobrīd pēc kārtas'
export const BEST_STREAK_TEXT = 'Visvairāk pēc kārtas'
export const DISCOURAGE_INAPP_BROWSER_TEXT =
  "Lietotnē iebūvētā tīmekļa pārlūka lietošana var radīt problēmas ar rezultātu saglabāšanu un dalīšanos. Iesakām lietot ierīces noklusēto tīmekļa pārlūku."
export const DATEPICKER_TITLE = 'Izvēlies datumu pagātnē'
export const DATEPICKER_CHOOSE_TEXT = 'Izvēlēties'
export const DATEPICKER_TODAY_TEXT = 'šodienu'
export const ARCHIVE_GAMEDATE_TEXT = 'Spēles diena'
