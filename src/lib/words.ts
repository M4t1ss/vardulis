import { WORDS } from '../constants/wordlist'
import { VALIDGUESSES } from '../constants/validGuesses'

export const isWordInWordList = (word: string) => {
  return (
    WORDS.includes(word.toLowerCase()) ||
    VALIDGUESSES.includes(word.toLowerCase())
  )
}

export const isWinningWord = (word: string) => {
  return solution === word
}

export const getWordOfDay = () => {
  // January 1, 2022 Game Epoch
  const epochMs = 1640988000000
  const now = Date.now()
  const msInDay = 86400000
  const index = Math.floor((now - epochMs) / msInDay)
  var totalLeft = (1-(((now - epochMs) /msInDay)-(index)))*24
  var hoursLeft = Math.floor(totalLeft)
  var mLeft = totalLeft-hoursLeft
  var minutesLeft = Math.floor(mLeft*60)
  console.log("Atlikušas " + hoursLeft + " stundas un " + minutesLeft + " minūtes līdz nākamajam vārdam.")

  return {
    solution: WORDS[index].toUpperCase(),
    solutionIndex: index,
  }
}

export const { solution, solutionIndex } = getWordOfDay()
