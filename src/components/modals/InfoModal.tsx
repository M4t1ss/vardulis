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
        <Cell value="I" isCompleted={true} />
        <Cell value="E" isCompleted={true} />
        <Cell value="R" isCompleted={true} />
        <Cell value="A" isCompleted={true} />
      </div>
      <p className="text-sm text-gray-500 dark:text-gray-300">
        Burts S ir vārdā un ir attiecīgajā pozīcijā.
      </p>
      <div className="flex justify-center mb-1 mt-4">
        <Cell value="M" isCompleted={true} />
        <Cell value="Ī"
          isRevealing={true}
          isCompleted={true}
          status="present"
        />
        <Cell value="K" isCompleted={true} />
        <Cell value="L" isCompleted={true} />
        <Cell value="A" isCompleted={true} />
      </div>
      <p className="text-sm text-gray-500 dark:text-gray-300">
        Burts Ī ir vārdā, bet citā pozīcijā.
      </p>

      <div className="flex justify-center mb-1 mt-4">
        <Cell value="G" isCompleted={true} />
        <Cell value="A" isCompleted={true} />
        <Cell value="Ļ" isRevealing={true} isCompleted={true} status="absent"  />
        <Cell value="A" isCompleted={true} />
        <Cell value="S" isCompleted={true} />
      </div>
      <p className="text-sm text-gray-500 dark:text-gray-300">
        Burts Ļ vārdā neatrodas nevienā pozīcijā.
      </p>

      <p className="mt-6 italic text-sm text-gray-500 dark:text-gray-300">
        Līdzīga spēle angļu valodā -{' '}
        <a
          href="https://ej.uz/angliskais-vardulis"
          className="underline font-bold"
        >
      </a>
      </p>
    </BaseModal>
  )
}
