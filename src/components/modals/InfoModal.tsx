import { Cell } from '../grid/Cell'
import { BaseModal } from './BaseModal'

type Props = {
  isOpen: boolean
  handleClose: () => void
}

export const InfoModal = ({ isOpen, handleClose }: Props) => {
  return (
    <BaseModal title="How to play" isOpen={isOpen} handleClose={handleClose}>
		<p className="text-sm text-gray-500">
		  Uzmini vārduli sešos mēģinājumos. Pēc katra minējuma katra burta
		  fona krāsa parādīs, cik tuvu Tavs minējums bijis patiesībai.
		</p>

		<div className="flex justify-center mb-1 mt-4">
		  <Cell value="S" status="correct" />
		  <Cell value="I" />
		  <Cell value="E" />
		  <Cell value="R" />
		  <Cell value="A" />
		</div>
		<p className="text-sm text-gray-500">
		  Burts S ir vārdā un ir attiecīgajā pozīcijā.
		</p>

		<div className="flex justify-center mb-1 mt-4">
		  <Cell value="M" />
		  <Cell value="Ī" status="present" />
		  <Cell value="K" />
		  <Cell value="L" />
		  <Cell value="A" />
		</div>
		<p className="text-sm text-gray-500">
		  Burts Ī ir vārdā, bet citā pozīcijā.
		</p>

		<div className="flex justify-center mb-1 mt-4">
		  <Cell value="G" />
		  <Cell value="A" />
		  <Cell value="Ļ" status="absent"  />
		  <Cell value="A" />
		  <Cell value="S" />
		</div>
		<p className="text-sm text-gray-500">
		  Burts Ļ vārdā neatrodas nevienā pozīcijā.
		</p>
    </BaseModal>
  )
}
