import { useToast, UseToastOptions } from "@chakra-ui/react";

const useNotify = () => {
    const toast = useToast()
    const NotifySuccess = (message: string, options?: UseToastOptions) => {
        toast({
            title: message,
            status: 'success',
            variant: 'solid',
            isClosable: true,
            ...options
        })
    }
    const NotifyError = (message: string, options?: UseToastOptions) => {
        toast({
            title: message,
            status: 'error',
            variant: 'solid',
            isClosable: true,
            ...options
        })
    }
    const Notify = (message: string, status: UseToastOptions['status'],options?: UseToastOptions) => {
        toast({
            title: message,
            status,
            variant: 'solid',
            isClosable: true,
            ...options
        })
    }
    return {
        NotifySuccess, NotifyError, Notify
    }
}

export default useNotify
