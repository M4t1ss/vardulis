import { BaseModal } from './BaseModal'

type Props = {
  isOpen: boolean
  handleClose: () => void
}

export const AboutModal = ({ isOpen, handleClose }: Props) => {
  return (
    <BaseModal title="Par Vārduli" isOpen={isOpen} handleClose={handleClose}>
      <p className="text-sm text-gray-500">
        Šis ir Wordle spēles atvērtā pirmkoda klons -{' '}
        <a
          href="https://github.com/hannahcode/GAME"
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
