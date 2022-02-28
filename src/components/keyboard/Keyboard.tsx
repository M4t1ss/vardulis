import { getStatuses } from '../../lib/statuses'
import { Key } from './Key'
import { useEffect } from 'react'
import { ENTER_TEXT, DELETE_TEXT } from '../../constants/strings'
import { localeAwareUpperCase } from '../../lib/words'

type Props = {
  onChar: (value: string) => void
  onDelete: () => void
  onEnter: () => void
  guesses: string[]
  isRevealing?: boolean
}

export const Keyboard = ({
  onChar,
  onDelete,
  onEnter,
  guesses,
  isRevealing,
}: Props) => {
  const charStatuses = getStatuses(guesses)

  const onClick = (value: string) => {
    if (value === 'ENTER') {
      onEnter()
    } else if (value === 'DELETE') {
      onDelete()
    } else {
      onChar(value)
    }
  }
  var prevkey = ""

  useEffect(() => {
    const listener = (e: KeyboardEvent) => {
	  
      if (e.code === 'Enter') {
        onEnter()
      } else if (e.code === 'Backspace') {
        onDelete()
      } else {
        const key = localeAwareUpperCase(e.key)
        // TODO: check this test if the range works with non-english letters
        if (key.length === 1 && key >= 'A' && key <= 'Z') {
          onChar(key)
        }
        if(prevkey === "apostrofs"){
			if(key === "A"){
			  onChar("Ā")
			}else if(key === "C"){
			  onChar("Č")
			}else if(key === "E"){
			  onChar("Ē")
			}else if(key === "G"){
			  onChar("Ģ")
			}else if(key === "K"){
			  onChar("Ķ")
			}else if(key === "L"){
			  onChar("Ļ")
			}else if(key === "I"){
			  onChar("Ī")
			}else if(key === "N"){
			  onChar("Ņ")
			}else if(key === "S"){
			  onChar("Š")
			}else if(key === "U"){
			  onChar("Ū")
			}else if(key === "Z"){
			  onChar("Ž")
			} 
          prevkey = ""
        }
      }
      if(e.code == "Quote" || e.code == "Backquote" || e.code == "AltRight"){
		prevkey = "apostrofs"
	  }
    }
    window.addEventListener('keyup', listener)
    return () => {
      window.removeEventListener('keyup', listener)
    }
  }, [onEnter, onDelete, onChar])

  return (
    <div>
      <div className="flex justify-center mb-1">
        {['Ā', 'E', 'Ē', 'R', 'T', 'U', 'Ū', 'I', 'Ī', 'O', 'P', 'Ļ'].map((key) => (
          <Key
            value={key}
            key={key}
            onClick={onClick}
            status={charStatuses[key]}
            isRevealing={isRevealing}
          />
        ))}
      </div>
      <div className="flex justify-center mb-1">
        {['A', 'S', 'Š', 'D', 'F', 'G', 'Ģ', 'H', 'J', 'K', 'Ķ', 'L'].map((key) => (
          <Key
            value={key}
            key={key}
            onClick={onClick}
            status={charStatuses[key]}
            isRevealing={isRevealing}
          />
        ))}
      </div>
      <div className="flex justify-center">
        <Key width={65.4} value="ENTER" onClick={onClick}>
          {ENTER_TEXT}
        </Key>
        {['Z', 'Ž', 'C', 'Č', 'V', 'B', 'N', 'Ņ', 'M'].map((key) => (
          <Key
            value={key}
            key={key}
            onClick={onClick}
            status={charStatuses[key]}
            isRevealing={isRevealing}
          />
        ))}
        <Key width={65.4} value="DELETE" onClick={onClick}>
          {DELETE_TEXT}
        </Key>
      </div>
    </div>
  )
}
