import { KeyValue } from '../../lib/keyboard'
import { getStatuses } from '../../lib/statuses'
import { Key } from './Key'
import { useEffect } from 'react'

type Props = {
  onChar: (value: string) => void
  onDelete: () => void
  onEnter: () => void
  guesses: string[]
}

export const Keyboard = ({ onChar, onDelete, onEnter, guesses }: Props) => {
  const charStatuses = getStatuses(guesses)

  const onClick = (value: KeyValue) => {
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
        const key = e.key.toUpperCase()
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
        <Key value="E" onClick={onClick} status={charStatuses['E']} />
        <Key value="Ē" onClick={onClick} status={charStatuses['Ē']} />
        <Key value="R" onClick={onClick} status={charStatuses['R']} />
        <Key value="T" onClick={onClick} status={charStatuses['T']} />
        <Key value="U" onClick={onClick} status={charStatuses['U']} />
        <Key value="Ū" onClick={onClick} status={charStatuses['Ū']} />
        <Key value="I" onClick={onClick} status={charStatuses['I']} />
        <Key value="Ī" onClick={onClick} status={charStatuses['Ī']} />
        <Key value="O" onClick={onClick} status={charStatuses['O']} />
        <Key value="P" onClick={onClick} status={charStatuses['P']} />
      </div>
      <div className="flex justify-center mb-1">
        <Key value="A" onClick={onClick} status={charStatuses['A']} />
        <Key value="Ā" onClick={onClick} status={charStatuses['Ā']} />
        <Key value="S" onClick={onClick} status={charStatuses['S']} />
        <Key value="Š" onClick={onClick} status={charStatuses['Š']} />
        <Key value="D" onClick={onClick} status={charStatuses['D']} />
        <Key value="F" onClick={onClick} status={charStatuses['F']} />
        <Key value="G" onClick={onClick} status={charStatuses['G']} />
        <Key value="Ģ" onClick={onClick} status={charStatuses['Ģ']} />
        <Key value="H" onClick={onClick} status={charStatuses['H']} />
        <Key value="J" onClick={onClick} status={charStatuses['J']} />
        <Key value="K" onClick={onClick} status={charStatuses['K']} />
        <Key value="Ķ" onClick={onClick} status={charStatuses['Ķ']} />
        <Key value="L" onClick={onClick} status={charStatuses['L']} />
        <Key value="Ļ" onClick={onClick} status={charStatuses['Ļ']} />
      </div>
      <div className="flex justify-center">
        <Key width={65.4} value="ENTER" onClick={onClick}>
          Ievadīt
        </Key>
        <Key value="Z" onClick={onClick} status={charStatuses['Z']} />
        <Key value="Ž" onClick={onClick} status={charStatuses['Ž']} />
        <Key value="C" onClick={onClick} status={charStatuses['C']} />
        <Key value="Č" onClick={onClick} status={charStatuses['Č']} />
        <Key value="V" onClick={onClick} status={charStatuses['V']} />
        <Key value="B" onClick={onClick} status={charStatuses['B']} />
        <Key value="N" onClick={onClick} status={charStatuses['N']} />
        <Key value="Ņ" onClick={onClick} status={charStatuses['Ņ']} />
        <Key value="M" onClick={onClick} status={charStatuses['M']} />
        <Key width={65.4} value="DELETE" onClick={onClick}>
          Dzēst
        </Key>
      </div>
    </div>
  )
}
