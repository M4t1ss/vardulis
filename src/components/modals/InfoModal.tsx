import { Cell } from '../grid/Cell'
import { BaseModal } from './BaseModal'

type Props = {
  isOpen: boolean
  handleClose: () => void
}

export const InfoModal = ({ isOpen, handleClose }: Props) => {
  return (
    <BaseModal title="Kā spēlēt" isOpen={isOpen} handleClose={handleClose}>
		<p className="text-sm text-gray-500">
		  Uzmini vārduli sešos mēģinājumos. Pēc katra minējuma katra burta
		  fona krāsa parādīs, cik tuvu Tavs minējums bijis patiesībai.
		</p>
      <div className="flex justify-center mb-1 mt-4">
        <Cell
          isRevealing={true}
          isCompleted={true}
          value="S"
          status="correct"
        />
        <Cell value="I" />
        <Cell value="E" />
						  
        <Cell value="R" />
        <Cell value="A" />
      </div>
      <p className="text-sm text-gray-500 dark:text-gray-300">
        Burts S ir vārdā un ir attiecīgajā pozīcijā.
      </p>
      <div className="flex justify-center mb-1 mt-4">
        <Cell value="M" />
        <Cell value="Ī"
          isRevealing={true}
          isCompleted={true}
          status="present"
        />
        <Cell value="K" />
        <Cell value="L" />
        <Cell value="A" />
      </div>
      <p className="text-sm text-gray-500 dark:text-gray-300">
        Burts Ī ir vārdā, bet citā pozīcijā.
      </p>

      <div className="flex justify-center mb-1 mt-4">
        <Cell value="G" />
        <Cell value="A" />
        <Cell value="Ļ" status="absent"  />
        <Cell value="A" />
        <Cell value="S" />
      </div>
      <p className="text-sm text-gray-500 dark:text-gray-300">
        Burts Ļ vārdā neatrodas nevienā pozīcijā.
      </p>

      <p className="mt-6 italic text-sm text-gray-500 dark:text-gray-300">
        Šis ir Wordle spēles atvērtā pirmkoda klons -{' '}
        <a
          href="https://github.com/m4t1ss/vardulis"
          className="underline font-bold"
        >
        ieskaties kodā šeit
        </a>{' '}
        un{' '}
        <a
          href="https://www.powerlanguage.co.uk/wordle/"
          className="underline font-bold"
        >
        spēlē oriģinālu šeit
      </a>
      </p>
    </BaseModal>
  )
}
